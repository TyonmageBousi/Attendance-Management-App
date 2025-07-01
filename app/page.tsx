"use client";

import Header from "./components/Header";
import Footer from "./components/Footer";

import Form from "./components/Form";
import Image from 'next/image';
import main from './assets/main.png';
import image1 from './assets/Webメディア運営.png';
import image2 from './assets/スクール事業.png';
import image3 from './assets/人材紹介業.png';
import Servise from "./components/Servise";

const images = [
    image1, image2, image3
]

export default function Example() {
    return (
        <div className="index">
            <Header />
            <div className="page-top">
                <Image src={main} alt="画像の説明" />
                <p>START</p>
                <p>仕事に最高のスタートを。</p>
            </div>
            <div className="news">
                <div className="title">
                    <p>ニュース</p>
                </div>
                <div className="content">
                        <Form /> 
                </div>
            </div>
            <div className="list">
                <div className="title">
                    <p>サービス</p>
                </div>
                <ul>
                    <Servise prop={images} />
                </ul>
            </div>
            <Footer />
            <p>@START</p>
        </div>
    );
}
