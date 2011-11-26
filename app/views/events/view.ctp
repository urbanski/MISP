<div class="events view">
<div class="actions" style="float:right;">
<?php if ( 0 == $event['Event']['alerted'] && ($isAdmin || $event['Event']['org'] == $me['org'])): 
// only show button if alert has not been sent  // LATER show the ALERT button in red-ish 
?>
    <ul><li><?php echo $this->Html->link(__('Finish Edit', true), array('action' => 'alert', $event['Event']['id']), array(), 'Are you sure this event is complete and everyone should be alerted?'); ?> </li></ul>
<?php elseif (0 == $event['Event']['alerted']): ?>
    <ul><li>Not finished editing</li></ul>
<?php else: ?>
    <!-- ul><li>Alert already sent</li></ul -->
<?php endif; ?>
    <ul><li><?php echo $this->Html->link(__('Contact reporter', true), array('action' => 'contact', $event['Event']['id']), array(), 'An email with your contact info will be sent to the reporter. Are you sure?'); ?> </li></ul>
</div>



<h2><?php  __('Event');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Org'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo Sanitize::html($event['Event']['org']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo Sanitize::html($event['Event']['date']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Risk'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['risk']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Info'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br(Sanitize::html($event['Event']['info'])); ?>
			&nbsp;
		</dd>
	</dl>
	
    <div class="related">
    	<h3><?php __('Related Signatures');?></h3>
    	<?php if (!empty($event['Signature'])):?>
    	<table cellpadding = "0" cellspacing = "0">
    	<tr>
    		<th><?php __('Type'); ?></th>
    		<th><?php __('Value'); ?></th>
    		<th class="actions"><?php __('Actions');?></th>
    	</tr>
    	<?php
    		$i = 0;
    		foreach ($event['Signature'] as $signature):
    			$class = null;
    			if ($i++ % 2 == 0) {
    				$class = ' class="altrow"';
    			}
    		?>
    		<tr<?php echo $class;?>>
    			<td><?php echo $signature['type'];?></td>
    			<td><?php echo nl2br(Sanitize::html($signature['value']));?></td>
    			<td class="actions" style="text-align:right;">
    				<?php
    				if ($isAdmin || $event['Event']['org'] == $me['org']) { 
    				    echo $this->Html->link(__('Edit', true), array('controller' => 'signatures', 'action' => 'edit', $signature['id'])); 
    				    echo $this->Html->link(__('Delete', true), array('controller' => 'signatures', 'action' => 'delete', $signature['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $signature['id'])); 
    				} ?>
    			</td>
    		</tr>
    	    <?php endforeach; ?>
    	</table>
        <?php endif; ?>
    	<?php if ($isAdmin || $event['Event']['org'] == $me['org']): ?>
    	<div class="actions">
    		<ul>
    			<li><?php echo $this->Html->link(__('New Signature', true), array('controller' => 'signatures', 'action' => 'add', $event['Event']['id']));?> </li>
    		</ul>
    	</div>
    	<?php endif; ?>
    </div>

</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
	<?php if ($isAdmin || $event['Event']['org'] == $me['org']): ?>
    	<li><?php echo $this->Html->link(__('New Signature', true), array('controller' => 'signatures', 'action' => 'add', $event['Event']['id']));?> </li>
		<li><?php echo $this->Html->link(__('Edit Event', true), array('action' => 'edit', $event['Event']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Event', true), array('action' => 'delete', $event['Event']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $event['Event']['id'])); ?> </li>
		<li>&nbsp;</li>
	<?php endif; ?>
        <?php echo $this->element('actions_menu'); ?>
	</ul>
</div>
