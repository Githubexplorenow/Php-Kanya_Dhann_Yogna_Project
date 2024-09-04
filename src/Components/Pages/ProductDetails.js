import { useParams } from "react-router-dom";
export default function ProductDetails() {
  const params = useParams();
  console.log("params:", params);

  return (
    <>
      <h1>Product Details Content</h1>
    </>
  );
}