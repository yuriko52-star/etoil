@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
    <div class="category__alert">
        @if(session('message'))
        <div class="category__alert--success">
        {{ session('message') }}
        </div>
        @endif
        @if($errors->any())
        <div class="category__alert--danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="category__content">
        <form action="/categories" class="create-form" method="post">
            @csrf
            <div class="create-form__item">
                <input type="text" class="create-form__item-input" name="name"value="{{ old('name') }}">
            </div>
            <div class="create-form__button">
                <button class="create-form__button-submit"type="submit">作成</button>
            </div>
        </form>
    </div>
    <div class="category-table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="categpry-table__header">Category</th>
            </tr>
            @foreach($categories as $category)
            <tr class="category-table__row">
                <td class="category-table__item">
                    <form action="/categories/update" class="update-form" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="update-form__item">
                            <input type="text" class="update-form__item-input" name="name" value="{{ $category['name'] }}">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit"type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="category-table__item">
                    <form action="/categories/delete" class="delete-form" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                         <input type="hidden" name="id" value="{{ $category['id'] }}">
                          <button class="delete-form__button-submit"type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection