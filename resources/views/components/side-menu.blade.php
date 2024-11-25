<div class="side-menu" id="sideMenu">
	<button class="close-btn" id="closeBtn">&times;</button>
	<ul class="header__menu">
		@foreach ($mainMenu as $m_key => $m_value)
			<li><a href="{{ $m_value['link'] }}">{{ $m_value['text'] }}</a></li>
		@endforeach
	</ul>
</div>
