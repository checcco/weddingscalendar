<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Pagina {:page} di {:pages}, visualizzati {:current} records di {:count} totali, partendo dal record {:start} fino al {:end}')
));
?>	</p>

<div class="paging">
<?php
	echo $this->Paginator->prev('< ' . __('precedente'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('successiva') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>