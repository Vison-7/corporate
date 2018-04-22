@extends(env('THEME').'.layouts.site')

@section('content')
    <div id="content-page" class="content group">
				            <div class="hentry group">
				                <form id="contact-form-contact-us" class="contact-form" method="post" action="{{url('/login')}}">
                                
				                    <div class="usermessagea"></div>
				                    <fieldset>
				                        <ul>
                                            <input  type="hidden" name="_token" value="{{ csrf_token() }}"/>
				                            <li class="text-field">
				                                <label for="name-contact-us">
				                                <span class="label">Имя</span>
				                                <br />					
				                                </label>
				                                <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input type="text" name="name" id="name" class="required" value="" /></div>
				                                <div class="msg-error"></div>
				                            </li>
				                            <li class="text-field">
				                                <label for="login">
				                                <span class="label">Пароль</span>
				                                <br />	
				                                </label>
				                                <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="password" name="password" id="password" class="required " value="" /></div>
				                                <div class="msg-error"></div>
				                            </li>
                                            
                                            <li class="submit-button">
				                               
				                                <input type="submit" name="yit_sendmail" value="Вход" class="sendmail alignright" />			
				                            </li>
				                           
				                        </ul>
				                    </fieldset>
				                </form>
				               
				            </div>
				           
				        </div>
@endsection