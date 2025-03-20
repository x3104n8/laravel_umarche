<x-tests.app>
    <x-slot name="header1">名前付きヘッダ1</x-slot>
コンポーネントテスト1
    <x-tests.card :message="$message" title="タイトルだよ" content="本文だよ"/>
    <x-tests.card                     title="タイトル2" />
</x-tests.app>
