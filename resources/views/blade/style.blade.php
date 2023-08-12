<style>
    .hidden {
        display: none;
    }
</style>
<div >
    <h3
        {{-- если нужно выводить какие-то стили в зависимости от каких-то условий --}}
        @style([
            'color: red' => $isRed,
            'color: blue' => $isBlue,
            'background: red' => $isBlue,
        ])
    >Hello World</h3>
    <p
        {{-- аналогично, только для классов --}}
        @class([
            'hidden' => !$isActive
        ])
    >
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius laudantium facilis praesentium molestias excepturi necessitatibus, molestiae ad quibusdam repellat voluptate non in nostrum temporibus veniam laboriosam amet veritatis fugiat sapiente!
    </p>
</div>

<form action="">
    @csrf
    <input type="text"
    @readonly(true) {{-- для добавления атрибута readonly --}}
    @disabled(true) {{-- для добавления атрибута disabled --}}
    @required(true) {{-- для добавления атрибута required --}}
    placeholder="Введите имя">

    <input type="checkbox" @checked($checkbox == true)> {{-- для добавления атрибута checked --}}

    <select name="" id="">
        <option value="">First</option>
        <option value="" @selected(true)>Second</option> {{-- для добавления атрибута selected --}}
    </select>
</form>
