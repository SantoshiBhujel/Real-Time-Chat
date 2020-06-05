@extends('layouts.app')
@section('content')
 <div id="app">
    <h1>ChatRoom</h1>
    <chat-log :messages="messages"></chat-log>
    <chat-composer v-on:messagesent="addMessage"></chat-composer>
</div>
@endsection