@extends('Master.layouts')
@section('content')
    {{-- @dd($messages->toArray()) --}}

    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            @foreach ($users as $user)
                                <li class="clearfix">
                                    <a href="{{ route('findMessage', [$sender->id, $user->id]) }}">

                                        <img src="{{ $user->photo }}" class="rounded-circle" alt="avatar">
                                        <div class="about">
                                            <div class="name">{{ $user->nom . ' ' . $user->prenom }}</div>
                                            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>


                    @isset($conversation)
                        <div class="chat">
                            <div class="chat-header clearfix">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                        </a>
                                        <div class="chat-about">
                                            <h6 class="m-b-0">Aiden Chavez</h6>
                                            <small>Last seen: 2 hours ago</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 hidden-sm text-right">
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                                class="fa fa-camera"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                                class="fa fa-image"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-info"><i
                                                class="fa fa-cogs"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                                class="fa fa-question"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div style="" class="chat-history h-50">
                                @if (count($conversation))
                                    <ul class="m-b-0 h-50">




                                        @foreach ($conversation as $message)
                                            {{-- @dd($message) --}}
                                            @if ($message->sender_id == $sender->id)
                                                <li class="clearfix d-flex flex-wrap">
                                                    <div class="message-data text-left col-12 text-end">
                                                        <span class="message-data-time">{{ $message->created_at }}</span>
                                                        <img src="{{ $sender->photo }}" alt="avatar">
                                                    </div>
                                                    <div class="message other-message text-right align-self-right w-100">
                                                        {{ $message->content }}</div>
                                                </li>
                                            @else
                                                <li class="clearfix">
                                                    <div class="message-data">
                                                        <img src="{{ $receiver->photo }}" alt="avatar">
                                                        <span class="message-data-time">{{ $message->created_at }}</span>

                                                    </div>
                                                    <div class="message my-message">{{ $message->content }}</div>
                                                </li>
                                            @endif
                                        @endforeach



                                    </ul>
                            </div>
                        @else
                            <div style="height: 100vh !important;"
                                class="chat-history d-flex justify-content-center align-items-center">

                                <img src="data:image/jpeg;base64,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"
                                    alt="">

                            </div>
                            @endif

                            <div class="chat-message clearfix">
                                <form action="{{ route('send') }}" class="input-group mb-0" method="POST">
                                    @csrf
                                    <input type="number" class="" value="{{ $sender->id }}" hidden name="sender_id">
                                    <input type="number" class="" value="{{ $receiver->id }}" hidden name="receiver_id">
                                    <input type="text" name="content" class="form-control border border-info rounded-5"
                                        placeholder="Enter text here...">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text btn text-primary"><i class="fa fa-send"></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endisset
                    @empty($conversation)
                        <div class="chat d-flex justify-content-center  align-item-center">
                            <div style="height: 100vh !important;"
                                class="chat-history d-flex align-items-center justify-content-center">
                                <div class=" align-self-center ">

                                    <h1 class="text-center">selectionner utilisateur</h1>
                                    <div class="d-flex justify-content-center">

                                        <img class=" w-50 border "
                                            src="https://img.freepik.com/free-vector/mobile-messaging-modern-communication-technology-online-chatting-sms-texting-modern-leisure-activity-guy-checking-email-inbox-with-smartphone_335657-3526.jpg?size=626&ext=jpg"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
@endsection
