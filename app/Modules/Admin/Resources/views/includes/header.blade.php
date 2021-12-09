<div class="navbar navbar-expand-lg navbar-dark border-transparent"
     @if($setting != null)) style="background-color: {{$setting->main_navbar_color}};" @endif>
    <div class="navbar-brand wmin-0 mr-5" style="padding-top:5px; padding-bottom:5px">
        <a href="{{route('dashboard')}}" class="d-inline-block">
            @if($setting != null && $setting->company_logo != null)
                <img src="{{asset('uploads/setting/'.$setting->company_logo)}}" alt="" style="height:50px;width:auto;">
            @else
                <img src="{{ asset('admin/global/images/demo_logo.png')}}" alt="" style="height:50px;width:auto;">
            @endif


        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block" id="sidebar">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item dropdown">
                {{-- <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="d-md-none ml-2">Messages</span>
                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">{{$notification['count_notification']}}</span>
                </a> --}}

                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-header card-header bg-success d-flex">
                        <span class="font-weight-semibold">Notification</span>
                    </div>

                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            @if(count($notification['list_notification']) > 0)
                                @foreach($notification['list_notification'] as $key => $notice)
                                    @php
                                        $icon = ($notice->is_read =='0') ? "icon-bell3" :"icon-bell-check";
                                        $icon_color = ($notice->is_read =='0') ? "text-danger" :"text-success";
                                    @endphp
                                    <li class="media @if($notice->is_read =='0') bg-light @endif">

                                        <div class="media-body">
                                            <div class="media-title">
                                                <a href="{{route('Notification.checkLink',['notification_id'=>$notice->id])}}">

                                                    <i class="{{$icon}} {{$icon_color}} mr-1"></i><span
                                                            class="text-dark">{!! $notice->message !!}</span>
                                                    <span class="text-muted float-right font-size-sm">{{$notice->created_at->diffForHumans()}}</span>
                                                </a>
                                            </div>

                                        </div>
                                        <hr class="mt-2 mb-0">
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <span>No Notification</span>
                                </li>
                            @endif

                        </ul>
                    </div>
                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="{{route('Notification.index')}}" class="bg-light text-grey w-100 py-2"
                           data-popup="tooltip" title="" data-original-title="See More"><i class="icon-menu7 d-block top-0"></i></a>
                    </div>
                </div>
            </li>
            @php
                use Illuminate\Support\Facades\Auth;
                $user = Auth::user();
               $user_type = $user->user_type;

               if($user_type != 'super_admin'){

                   // if($user->userEmployer->profile_pic != ''){
                   //     $imagePath = asset($user->userEmployer->file_full_path).'/'.$user->userEmployer->profile_pic;
                   //      $imagePath = asset('admin/default.png');
                   // }else{
                   $imagePath = asset('admin/default.png');
                   // }

               }else{
               $imagePath = asset('admin/default.png');
           }

            @endphp

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ $imagePath }}" class="rounded-circle mr-2" height="34" alt="">
                    <span>{{ $user->first_name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('change-password')}}" class="dropdown-item"><i class="icon-key"></i> Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout')}}" class="dropdown-item"><i class="icon-exit2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
