<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Quản lý',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		
		if(Yii::app()->getModule('user')->isAdmin() && ($this->route=='conference/index')){
			$criteria=new CDbCriteria;
			$criteria->select='id, name';  
			$company = Company::model()->findAll($criteria);
			$company_id = 0;
			if(isset($_GET['company_id']))
				$company_id = $_GET['company_id'];
			$this->widget('ext.dropdownredirect.DropDownRedirect',
			array(
			 'data' => CHtml::listData($company,'id','name'), 
			 'url' => $this->createUrl($this->route, array_merge($_GET, array('company_id' => '__value__'))),
			 'select' => $company_id,    
			));	 
		}
		
		
	?>
	
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>