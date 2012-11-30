<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Permissions'),
); ?>

<div id="permissions">


	<p>
		<?php echo Rights::t('core', 'Here you can view and manage the permissions assigned to each role.'); ?><br />
		<?php echo Rights::t('core', 'Authorization items can be managed under {roleLink}, {taskLink} and {operationLink}.', array(
			'{roleLink}'=>CHtml::link(Rights::t('core', 'Roles'), array('authItem/roles')),
			'{taskLink}'=>CHtml::link(Rights::t('core', 'Tasks'), array('authItem/tasks')),
			'{operationLink}'=>CHtml::link(Rights::t('core', 'Operations'), array('authItem/operations')),
		)); ?>
	</p>





	<p class="info">*) <?php echo Rights::t('core', 'Hover to see from where the permission is inherited.'); ?></p>



</div>
 <div class="table_tabs_menu" style="padding-top:10px">
        <!--[if !IE]>start  tabs<![endif]-->
<?php echo CHtml::link('<span><span><em>'. Rights::t('core', 'Generate items for controller actions') .'</em></span></span>', array('authItem/generate'), array(
        'class'=>'update',
    )); ?>
        <!--[if !IE]>end  tabs<![endif]-->


        </div>
        <!--[if !IE]>start table_wrapper<![endif]-->
        <div class="table_wrapper">
            <div class="table_wrapper_inner">
            <?php
            $widget= $this->widget('application.components.widgets.ImeetingGridView', array(

                'pager'=>array('cssFile'=>false,'class'=>'ImeetingLinkPager'),

                'template'=>'{items} ',
                'dataProvider'=>$dataProvider,
                'cssFile' => false,
                 'emptyText'=>Rights::t('core', 'No users found.'),

                'columns'=>$columns,

            ));

             ?>
    <div class="pagination_wrapper">
        <span class="pagination_top"></span>
        <div class="pagination_middle">
        <div class="pagination">
            <span class="page_no"><?php $widget->renderSummary(); ?></span>
            <?php $widget->renderPager(); ?>
        </div>
        </div>
        <span class="pagination_bottom"></span>
        </div>

            </div>
        </div>
        <!--[if !IE]>end table_wrapper<![endif]-->


<script type="text/javascript">

		/**
		* Attach the tooltip to the inherited items.
		*/
		jQuery('.inherited-item').rightsTooltip({
			title:'<?php echo Rights::t('core', 'Source'); ?>: '
		});

		/**
		* Hover functionality for rights' tables.
		*/
		$('#rights tbody tr').hover(function() {
			$(this).addClass('hover'); // On mouse over
		}, function() {
			$(this).removeClass('hover'); // On mouse out
		});

	</script>