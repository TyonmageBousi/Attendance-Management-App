
type ContentItem =
    { date: string, content: string }


type Props = {
    contents: ContentItem[]; // ← 親からもらう props の型
};

export default function Contents({ contents }: Props) {
    return (
        <div>
            {contents.map((content) => (
                <li>
                    <p>{content.date}</p>
                    <p>{content.content}</p>
                </li>
            ))}
        </div>
    )
}