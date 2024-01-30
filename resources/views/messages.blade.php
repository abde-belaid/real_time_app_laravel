{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ----------> --}}




    <!--

A concept for a chat interface.

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->
@extends('Master.layouts')
@section('content')
    


    <div id="frame">
        <div id="sidepanel">
            <div id="profile">
                <div class="wrap">
                    <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online"
                        alt="" />
                    <p>{{ $sender->nom . '   ' . $sender->prenom }}</p>
                    {{-- <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
				<div id="status-options">
					<ul>
						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
						<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
						<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
						<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
					</ul>
				</div> --}}
                    {{-- <div id="expanded">
					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mikeross" />
					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="ross81" />
					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mike.ross" />
				</div> --}}
                </div>
            </div>
            <div id="search">
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                <input type="text" placeholder="Search contacts..." />
            </div>
            <div id="contacts">
                <ul>
                    @foreach ($users as $user)
                        <li class="contact">
                            <a href="{{ route('findMessage', [$sender->id, $user->id]) }}"
                                class=" text-decoration-none text-light ">
                                <div class="wrap">
                                    <span class="contact-status online"></span>
                                    <img src="{{ $user->photo }}" alt="" />
                                    <div class="meta">
                                        <p class="name">{{ $user->nom . ' ' . $user->prenom }}</p>
                                        {{-- <p class="preview">You just got LITT up, Mike.</p> --}}
                                        <p class="preview">left 7 mins ago</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach

                    {{-- @foreach ($users as $user)
                <li class="clearfix">
                    <a href="{{ route('findMessage', [$sender->id, $user->id]) }}">

                        <img src="{{ $user->photo }}" class="rounded-circle" alt="avatar">
                        <div class="about">
                            <div class="name">{{ $user->nom . ' ' . $user->prenom }}</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>
                        </div>
                    </a>
                </li>
            @endforeach --}}

                </ul>
            </div>
            {{-- <div id="bottom-bar">
			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
			<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
		</div> --}}

        </div>
        @isset($conversation)
            <div class="content">
                <div class="contact-profile">
                    <img src="{{$receiver->photo}}" alt="" />
                    <p>{{$receiver->nom . ' '.$receiver->prenom }}</p>
                    <div class="social-media">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="messages">
                    @if (count($conversation))
                        <ul class="chat-list">
                            @foreach ($conversation as $message)
                                @if ($message->sender_id == $sender->id)
                                    <li class="replies">
                                        <img src="{{ $sender->photo }}" alt="" />
                                        <p> {{ $message->content }}</p>
                                    </li>
                                @else
                                    <li class="sent">
                                        <img src="{{ $receiver->photo }}" alt="" />
                                        <p> {{ $message->content }}</p>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="message-input mt-5">
                    <div class="wrap">
                        </form>
                        <form action="{{ route('send') }}" class="input-group mb-0" method="POST">
                            @csrf
                            <input type="number" class="" value="{{ $sender->id }}" hidden name="sender_id">
                            <input type="number" class="" value="{{ $receiver->id }}" hidden name="receiver_id">
                            <input type="text" autofocus name="content" placeholder="écrire votre message..."
                                class="form-control" />
                            <i class="fa fa-paperclip attachment"></i>
                            <button class=""><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endisset
    </div>
    @endsection
    

