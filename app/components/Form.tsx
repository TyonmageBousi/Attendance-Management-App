"use client"

import { useState } from "react"
import Contents from "./Contents";
type Contents =
    { date: string, content: string };


export default function Test() {

    const [content, setContent] = useState<Contents>({ date: "", content: "" });
    const [values, setValue] = useState<Contents[]>([]);
    const upload = () => {
        setValue((prevalue) => [...prevalue, content])
        setContent({ date: "", content: "" });
    }
    return (
        <div>
            <p>日付を入れて</p>
            <input name="text"
                value={content.date}
                onChange={(e) => setContent({ ...content, date: e.target.value })} />
            <p>内容を入れて</p>
            <input name="text" value={content.content}
                onChange={(e) => setContent({ ...content, content: e.target.value })} />
            <p></p>
            <button onClick={upload} > 投稿する</button>
            <p>投稿内容</p>
            <ul>
                <Contents contents={values}/>
            </ul>
        </div>
    )

}