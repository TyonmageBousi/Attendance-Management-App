export default function Footer() {
    const lists: string[] = ["ホーム", "メッセージ", "会社概要"];
    return (
        <footer>
            {lists.map((list) => (<p>{list}</p>)
            )}
        </footer>
    )
}