@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    <div class="todo__alert--success">
        Todoを作成しました
    </div>
</div>
<div class="todo__content">
    <form action="/todos" class="create-form" method="post">
        @csrf
        <div class="create-form__item">
            <input type="text" class="create-form__item-input"name="content">
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit"type="submit">作成</button>
        </div>
    </form>
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
            </tr>
            @foreach($todos as $todo)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="" class="update-form" method="">
                        <div class="update-form__item">
                            <input type="text" class="update-form__item-input"value="{{ $todo['content'] }}">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit"type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form action="" class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit"type="submit">削除

                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
            <!-- <tr class="todo-table__row"> 
                <td class="todo-table__item">
                    <form action="" class="update-form" method="">
                        <div class="update-form__item">
                            <input type="text" class="update-form__item-input"value="test2">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit"type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form action="" class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit"type="submit">削除

                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            -->
        </table>
    </div>
</div>

@endsection