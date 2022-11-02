import React, {useState } from "react";
import Form from 'react-bootstrap/Form'
import Button from 'react-bootstrap/Button'
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import axios from 'axios'
import Swal from 'sweetalert2';
import { useNavigate } from 'react-router-dom'

function CreateList() {
    const navigate = useNavigate();
    const [board_id, setBoardId] = useState()
    const [title, setTitle] = useState("")
    const [position, setPosition] = useState("")
    const [validationError,setValidationError] = useState({})
  
    const createList = async (e) => {
      e.preventDefault();
  
      const formData = new FormData()
  
      formData.append('title', title)
      formData.append('position', position)
      formData.append('board_id', board_id)
      await axios.post('http://localhost:8000/api/listts', formData)
      .then(({response})=>{ Swal.fire({this.setState({})
          icon:"success",
          text:data.message
        })
        navigate("/")
      }).catch(({response})=>{
        if(response.status===422){
          setValidationError(response.data.errors)
        }else{
          Swal.fire({
            text:response.data.message,
            icon:"error"
          })
        }
      })
    }
  return (
    <div className="container">
      <div className="row justify-content-center">
        <div className="col-12 col-sm-12 col-md-6">
          <div className="card">
            <div className="card-body">
              <h4 className="card-title">Create List</h4>
              <hr />
              <div className="form-wrapper">
                {
                  Object.keys(validationError).length > 0 && (
                    <div className="row">
                      <div className="col-12">
                        <div className="alert alert-danger">
                          <ul className="mb-0">
                            {
                              Object.entries(validationError).map(([key, value])=>(
                                <li key={key}>{value}</li>   
                              ))
                            }
                          </ul>
                        </div>
                      </div>
                    </div>
                  )
                }
                <Form onSubmit={createList}>
                  <Row> 
                      <Col>
                        <Form.Group controlId="Title">
                            <Form.Label>Title</Form.Label>
                            <Form.Control type="text" value={title} onChange={(event)=>{
                              setTitle(event.target.value)
                            }}/>
                        </Form.Group>
                      </Col>  
                  </Row>
                  <Row className="my-3">
                      <Col>
                        <Form.Group controlId="Position">
                            <Form.Label>Position</Form.Label>
                            <Form.Control type="number" value={position} onChange={(event)=>{
                              setPosition(event.target.value)
                            }}/>
                        </Form.Group>
                      </Col>
                  </Row>
                  <Row>
                    <Col>
                      <Form.Group controlId="BoardId" className="mb-3">
                        <Form.Label>Board_id</Form.Label>
                        <Form.Control type="number"  defaultValue="Initial value" onChange={(event)=>{
                              setBoardId(event.target.value.board_id)
                            }}/>
                      </Form.Group>
                    </Col>
                  </Row>
                  <Button variant="primary" className="mt-2" size="lg" block="block" type="submit">
                    Save
                  </Button>
                </Form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}
export default CreateList;
