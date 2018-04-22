@foreach($items as $item)
   
            <ul>
                <li> {{$item->name}} - {{$item->position->name}} - Оклад: {{$item->position->salary}} у.е., работает с: {{date_format(date_create($item->since_date), 'd-m-Y' )}}
          
                    @if(isset($work[$item->id]) )
                        @include(env('THEME').'.inc_workers', ['items' => $work[$item->id] ])
                    @endif
                </li>
            </ul>
   
@endforeach