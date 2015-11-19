<?php
namespace app\helper;
/**
 *  无限极分类类
 */
class Rtype{
	
	public $list = array();
	
    function paixu($type,$pid = 0,$deep = 0){
    	
    	foreach($type as $key=>$val){
    		if($val['parent_id'] == $pid){
    			
    			$val['deep'] = $deep;
    			$this -> list[] = $val;
    			$this->paixu( $type, $val['know_id'], $deep+1);
  
    		}
    	}
    }
    
}
?>