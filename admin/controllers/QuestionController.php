<?php

namespace app\controllers;
use app\helper\Rtype;
use app\models\Knowpoint;
use app\models\Question;
use Yii;
use app\models\RealQuestion;
use app\models\Classify;
use app\models\Company;
use app\models\UploadForm;
use yii\mongodb\ActiveQuery;
use yii\mongodb\Query;
use yii\web\UploadedFile;
use yii\data\Pagination;
use yii\widgets\ActiveForm;


class QuestionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 添加真题
     * @return string
     */
    public function actionAdd_rquestion(){
        $model = new RealQuestion();

        $up_model = new UploadForm();
        //设置图片上传的路径
        $rootPath = 'uploads/real_question/';

        if (Yii::$app->request->isPost) {

            $image = UploadedFile::getInstance($model, 'rq_img');
            $ext = $image->getExtension();
            //生成随机的图片名称并散列放入文件夹中
            $randName = time() . rand(1000, 9999) . "." . $ext;
            $path = abs(crc32($randName) % 500);
            $rootPath = $rootPath . $path . "/";
            if (!file_exists($rootPath)) {
                mkdir($rootPath,0755,true);
            }
            $image->saveAs($rootPath . $randName);
            $model->attributes = $_POST['RealQuestion'];
            $model->rq_id = (RealQuestion::find()->max('rq_id'))+1;
            $model->rq_img = $rootPath.$randName;
            if($model->save()){
                //\Yii::$app->getSession()->setFlash('success', '添加成功！');
                $this->redirect(['question/rquestion_list']);
            }else{
                \Yii::$app->getSession()->setFlash('error', '添加失败！');
            }
        }

        //查询出classify表中的所有数据
        $classify = classify::find()->all();
        $info[0] = '请选择';
        foreach($classify as $val){
            $info[$val->class_id] = $val->class_name;
        }

        //查询出公司信息
        $company = Company::find()->all();
        $company_info[0] = '请选择';
        foreach($company as $v){
            $company_info[$v->com_id] = $v->com_name;
        }

        return $this->render('add_rquestion',[
            'classify' => $info,
            'model' => $model,
            'company' => $company_info,
        ]);

    }

    /**
     * 真题列表
     * @return string
     */
    public function actionRquestion_list(){

        $data = RealQuestion::find()->orderBy('rq_id desc');
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '5']);
        $list = $data->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        return $this->render('rquestion_list',[
           'model' => $list,
           'pages' => $pages,
        ]);

    }

    /**
     * 知识点列表
     * @return string
     */

    public function actionKnowpoint(){

        $list = Knowpoint::find()->asArray()->all();
        $rtype = new Rtype();
        $rtype->paixu($list);
        $know_list = $rtype->list;
        return $this->render('knowpoint',[
            'model' => $know_list,
        ]);
    }

    /**
     * 添加知识点
     * @return string
     */

    public function actionAdd_knowpoint(){
        $model = new Knowpoint();

        if(Yii::$app->request->isPost){
            //验证表单
            $model->validate();
            $know = Yii::$app->request->post('Knowpoint');
            $know_id = (Knowpoint::find()->max('know_id'))+1;
            $model->know_id = $know_id;
            $model->know_name = $know['know_name'];
            $model->level = $know['level'];
            $model->parent_id = $know['parent_id'];
            if($model->save()){
                Yii::$app->getSession()->setFlash('success', '添加成功！');
                $this->redirect(['question/knowpoint']);
            }else{
                Yii::$app->getSession()->setFlash('error', '添加失败！');
            }
        }

        return $this->render('add_knowpoint',[
            'model' => $model
        ]);

    }

    /**
     * 根据等级查询出父等级的知识点
     * @return json
     */
    public function actionSel_parent(){
        $level = Yii::$app->request->post('level');
        $know = Knowpoint::find()->select(['know_id','know_name'])->where(['level'=>"".($level-1).""])->asArray()->all();
        echo json_encode($know);
    }

    /**
     * 试题列表
     * @return string
     */
    public function actionQuestion(){

        $data = Question::find()->orderBy('q_id desc');
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '10']);
        $question = $data->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        foreach($question as &$val){
            $val['q_selects'] = unserialize($val['q_selects']);
            $val['q_answer'] = unserialize($val['q_answer']);
        }
        return $this->render('question',[
            'model' => $question,
            'pages'    => $pages,
        ]);
    }

    public function actionAdd_question(){
        $model = new Question();
        //设置场景
        //执行添加
        if(Yii::$app->request->isPost){
            $model->scenario = 'add';
            $model->validate();
            $question = Yii::$app->request->post('Question');
            $model->q_id = (Question::find()->max('q_id'))+1;
            $model->join_sum = 0;
            $model->q_type = $question['q_type'];
            $model->attributes = $question;
            $model->know_id = $question['know_id'];
            $model->rq_id = $question['rq_id'];
            //处理选项
            $selects = explode('#',trim($question['q_selects'],'#'));
            $model->q_selects = serialize($selects);
            //处理答案
            $answer = explode('#',trim($question['q_answer'],'#'));
            $model->q_answer = serialize($answer);
            if($model->save()){
                $this->redirect(['question/question']);
            }else{
                Yii::$app->getSession()->setFlash('error', '添加失败！');
            }
        }

        //查询数知识点
        $know = Knowpoint::find()->select(['know_id','know_name','parent_id'])->asArray()->all();
        $rtype = new Rtype();
        $rtype->paixu($know);
        $know = $rtype->list;

        //查询真题
        $rq_list = RealQuestion::find()->orderBy('rq_id')->asArray()->all();
        foreach($rq_list as &$val){
            $rq[$val['rq_id']] = $val['rq_title'];
        }

        return $this->render('add_question',[
            'model' => $model,
            'know'  => $know,
            'rq'    => $rq,
        ]);
    }


}
