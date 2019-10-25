@if(count($links) == 1)
  @php

    if(! empty($links[0]['icon'])){
      $links[0]['value'] = "<i class=\"{$links[0]['icon']}\"></i> <span class=\"hidden-sm-down\">" . $links[0]['value'] . "</span>";
    }

    $class = 'btn btn-primary';

    if(! empty($links[0]['attributes']['class'])){
      $links[0]['attributes']['class'] = $class . ' ' . $links[0]['attributes']['class'];
    }else{
      $links[0]['attributes']['class'] = $class;
    }

    if(! empty($links[0]['alt-class'])){
      $links[0]['attributes']['class'] .= ' ' . $links[0]['alt-class'];
    }

  @endphp
  {!! Form::bsButton($links[0]['value'], $links[0]['attributes']) !!}
@else

  <div class="dropdown">
    @php
      $extraClass = ($attributes['ellipsis'] ?? true === false) ? '' : ' ellipsis';
    @endphp
    <button class="btn btn-primary dropdown-toggle{{$extraClass}}" data-toggle="dropdown">
      <span class="btn-text">
        {{$value}}
      </span>
    </button>
    <div class="dropdown-menu">
      @foreach($links as $link)
        <a
        @foreach($link['attributes'] as $k=>$v)
          @if($k == 'class')
          {!! $k !!}="dropdown-item {!! $v !!}"
          @else
          {!! $k !!}="{!!$v!!}"
          @endif
        @endforeach
        @if(! in_array('class', $link['attributes']))
         class="dropdown-item"
        @endif
        >
        @if(isset($link['icon']) && $link['icon'] != null)
          <i class="{{ $link['icon'] }}"></i>
        @endif
      {!! $link['value'] !!}</a>
      @if(isset($link['divider']) && $link['divider'] == true)
        <div class="dropdown-divider"></div>
      @endif
      @endforeach
    </div>
  </div>
@endif