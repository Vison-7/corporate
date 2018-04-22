<li>  {{$item->name}} - {{$item->position->name}} - Оклад: {{$item->position->salary}} у.е., работает с: {{$item->since_date -> format('d-m-Y')}}
   <!-- Выводились ли дочерние элементы? -->
    @set($ul, false)
    
  <!-- Бесконечный цикл, в котором мы ищем все дочерние элементы -->   
   @while (true)
    <!-- Ищем дочерний элемент -->
  {{$key = array_search($item -> id, $childrens)}}
     <!-- Дочерних элементов не найдено -->
        @if(!$key) 
          @if ($ul) 
    <!-- Если выводились дочерние элементы, то закрываем список -->
        </ul>
    <!-- Выходим из цикла -->
        @break
        @endif

        @endif
    <!--Удаляем найденный элемент (чтобы он не выводился ещё раз) -->
      @unset($childrens[$key])

      @if(!$ul) 
    <!--  Начинаем внутренний список, если дочерних элементов ещё не было-->
       <ul>
       <!-- Устанавливаем флаг -->   
        @set($ul, true)
    @endif
           
    @if(isset($workers[$key]) )
       <!-- Рекурсивно выводим все дочерние элементы -->     
       @include(env('THEME').'.inc_w2', ['item' => $workers[$key], 'childrens' => $array])
           
    @endif
   
   @endwhile

</li>

 