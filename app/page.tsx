"use client";

import Header from "./components/Header";

import Form  from "./components/Form";
export default function Example() {
    return (
        <div className="index">
            <Header />
            <div className="page-top">
                <img src="image/main_image.png" alt="画像の説明" />
            </div>

            <div className="news">
                <div className="title">
                    <p>ニュース</p>
                </div>
                <div className="content">
                    <ul>
                        <Form/>
                    </ul>
                </div>
            </div>

            <div className="list">
                <div className="title">
                    <p>サービス</p>
                </div>
                <ul>
                    <li>
                        <img src="image/人材紹介業.png" alt="人材紹介業の画像" />
                    </li>
                    <li>
                        <img src="image/スクール事業.png" alt="スクール事業の画像" />
                    </li>
                    <li>
                        <img src="image/Webメディア運営.png" alt="WEBメディア運営の画像" />
                    </li>
                </ul>
            </div>

            <footer>
                <p>ホーム</p>
                <p>メッセージ</p>
                <p>会社概要</p>
            </footer>

            <p>@START</p>
        </div>
    );
}
