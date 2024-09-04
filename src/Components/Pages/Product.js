import React from 'react'
import Form from 'react-bootstrap/Form';
import { Button } from 'react-bootstrap';

const Product = () => {
  return (
    <div className='wrapper'>
        <h1>Booklist</h1>
        <div className='main'>
            <div className='form-container'>
<Form.Group>
<Form.Label>Title</Form.Label>
<Form.Control type="text"/>

</Form.Group>
<Form.Group>
  <Form.Label>Author</Form.Label>
  <Form.Control type='text'/>
</Form.Group>
<Form.Group>
  <Form.Label>#ISBN</Form.Label>
  <Form.Control type='text'/>
</Form.Group>
<Button varient ="primary" type="submit">Add Books Details</Button>

            </div>
        </div>

      
    </div>
  )
}

export default Product;
