<div class="dark:text-white border-white rounded-md border mx-4 my-4 px-4 py-4">
    <table class="w-full">
        <thead>
            @isset($tableHead)
                {{ $tableHead }}
            @endisset
        </thead>
        <tbody>
            @isset($tableBody)
                {{ $tableBody }}
            @endisset
        </tbody>
    </table>
</div>
