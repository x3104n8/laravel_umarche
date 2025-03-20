<x-tests.app>
    <x-slot name="header1">名前付きヘッダ1</x-slot>
コンポーネントテスト1
    <x-tests.card title="タイトルだよ" content="本文だよ" :message="$message" />
    <x-tests.card title="タイトル2" />   <!-- :message,  contentは tests.card 側の初期値が採用される -->
    <x-tests.card title="タイトル2" class="bg-red-300"/>
</x-tests.app>
