export default function Header() {
    const lists: string[] = ["ホーム", "メッセージ", "会社概要"];
    return (
        <header>
            <h1>ちょんまげ</h1>
            <ul>
                {lists.map((menu) => (
                    <li>{menu}</li>
                ))}
            </ul>
        </header>
    );
}