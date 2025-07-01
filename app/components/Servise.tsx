import Image, { StaticImageData } from "next/image";

type ServiseImage = {
    prop: StaticImageData[];
}
export default function Servise(props: ServiseImage) {

    return (
        <div>
            <ul>
                {props.prop.map((img) => (
                    <li>
                        <Image src={img} alt=""></Image>
                    </li>
                ))}
            </ul>
        </div>
    );


}