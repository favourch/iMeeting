<?php
Yii::import('system.web.widgets.pagers.CLinkPager');
class ImeetingLinkPager extends CLinkPager {
     //.... your methods
	public $htmlOptions = array('class'=>'pag_list');
	public $selectedPageCssClass = 'curent_page';

    public function run()
	{
		$this->registerClientScript();
		$buttons=$this->createPageButtons();
		if(empty($buttons))
			return;
	//	echo $this->header;
		echo CHtml::tag('ul',$this->htmlOptions,implode("\n",$buttons));
		echo $this->footer;
	}
	protected function createPageButtons()
	{
		if(($pageCount=$this->getPageCount())<=1)
			return array();

		list($beginPage,$endPage)=$this->getPageRange();
		$currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons=array();

		// first page
		$buttons[]=$this->createPageButton($this->firstPageLabel,0,$this->firstPageCssClass,$currentPage<=0,false,array("class"=>"pag_nav"));

		// prev page
		if(($page=$currentPage-1)<0)
			$page=0;
		$buttons[]=$this->createPageButton($this->prevPageLabel ,$page,$this->previousPageCssClass,$currentPage<=0,false,array("class"=>"pag_nav"));

		// internal pages
		for($i=$beginPage;$i<=$endPage;++$i)
			$buttons[]=$this->createPageButton($i+1,$i,$this->internalPageCssClass,false,$i==$currentPage);

		// next page
		if(($page=$currentPage+1)>=$pageCount-1)
			$page=$pageCount-1;
		$buttons[]=$this->createPageButton($this->nextPageLabel ,$page,$this->nextPageCssClass,$currentPage>=$pageCount-1,false,array("class"=>"pag_nav"));

		// last page
		$buttons[]=$this->createPageButton($this->lastPageLabel ,$pageCount-1,$this->lastPageCssClass,$currentPage>=$pageCount-1,false,array("class"=>"pag_nav"));

		return $buttons;
	}
	protected function createPageButton($label,$page,$class,$hidden,$selected, $htmlOptions=null)
	{
		if($hidden || $selected)
			return '<li >'.CHtml::link("<span><span>".$label."</span></span>",$this->createPageUrl($page),array("class"=>"current_page")).'</li>';
		//	$class.=' '.($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
		return '<li >'.CHtml::link("<span><span>".$label ."</span></span>",$this->createPageUrl($page),$htmlOptions).'</li>';
	}

}