import React, { useState } from 'react';
import axios from 'axios';



function Register (props) {

    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [image, setImage] = useState('');
    const handleSubmit = (e) => {
        e.preventDefault();
       axios.post('http://127.0.0.1:8000/api/register', {
            name: setName,
            email: setEmail,
            password: setPassword,
            image: setImage,
        })
        .then(response => {console.log(response)});
    }
    return (
        <div className="container h-100 "> 
        <p className="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registeration</p>
        <form onSubmit={handleSubmit}>
        <input
                        type="text"
                        name="name"
                        placeholder="name"
                        value={name}
                        onChange={e => setName(e.target.value)} required />
                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        value={email}
                        onChange={e => setEmail(e.target.value)} required />
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        value={password}
                        onChange={e => setPassword(e.target.value)} required />
                     <input
                        type="file"
                        name="image"
                        placeholder="image"
                        value={image}
                        onChange={e => setImage(e.target.value)} required />
                    <button type="submit">Register</button>
        </form>
</div>




        // <div> 
        //      <div className="container h-100 ">
        //          <div className="row d-flex justify-content-center align-items-center h-100">
        //              <div className="col-lg-12 col-xl-11">
        //                 <div className="justify-content-center">
        //                      <div className="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
        //                              <p className="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
        //                              <form className="mx-1 mx-md-4">
        //                                  <div className="d-flex flex-row align-items-center mb-4">
        //                                      <i className="fas fa-user fa-lg me-3 fa-fw"></i>
        //                                      <div className="form-outline flex-fill mb-0">
        //                                          <input 
        //                                          className="form-control"
        //                                          id="form3Example1c" 
        //                                          type="text"
        //                                          name="name"
        //                                          placeholder="name"
        //                                          value={name}
        //                                          onChange={e => setName(e.target.value)} required/>
        //                                          <label className="form-label" htmlFor="form3Example1c"><b>Your Name</b></label>
        //                                      </div>
        //                                  </div>
 
        //                                  <div className="d-flex flex-row align-items-center mb-4">
        //                                      <i className="fas fa-envelope fa-lg me-3 fa-fw"></i>
        //                                      <div className="form-outline flex-fill mb-0">
        //                                          <input 
        //                                          className="form-control"
        //                                          id="form3Example1c" 
        //                                          type="text"
        //                                          name="email"
        //                                          placeholder="email"
        //                                          value={email}
        //                                          onChange={e => setEmail(e.target.value)} required/>
        //                                          <label className="form-label" htmlFor="form3Example3c" ><b>Your Email</b></label>
        //                                      </div>
        //                                  </div>
 
        //                                  <div className="d-flex flex-row align-items-center mb-4">
        //                                      <i className="fas fa-lock fa-lg me-3 fa-fw"></i>
        //                                      <div className="form-outline flex-fill mb-0">
        //                                          <input 
        //                                          className="form-control"
        //                                          id="form3Example4c" 
        //                                          type="password"
        //                                          name="password"
        //                                          placeholder="password"
        //                                          value={email}
        //                                          onChange={e => setPassword(e.target.value)} required/>
        //                                          <label className="form-label" htmlFor="form3Example4c"><b>Password</b></label>
        //                                      </div>
        //                                  </div>
 
        //                                  {/* <div className="d-flex flex-row align-items-center mb-4">
        //                                      <i className="fas fa-key fa-lg me-3 fa-fw"></i>
        //                                      <div className="form-outline flex-fill mb-0">
        //                                      <input 
        //                                          className="form-control"
        //                                          id="form3Example4c" 
        //                                          type="comfirmatiom_password"
        //                                          name="comfirmatiom_password"
        //                                          placeholder="comfirmatiom_password"
        //                                          value={comfirmatiom_password}
        //                                          onChange={e => setConfirmation(e.target.value)} required/>
        //                                          <label className="form-label" htmlFor="form3Example4cd"><b>Repeat your password</b></label>
        //                                      </div>
        //                                  </div> */}
        //                                  <div className="d-flex flex-row align-items-center mb-4">
        //                                      <i className="fas fa-key fa-lg me-3 fa-fw"></i>
        //                                      <div className="form-outline flex-fill mb-0">
        //                                          <input type="file" id="form3Example2cd" className="form-control" name="image" />
        //                                          <input 
        //                                          className="form-control"
        //                                          id="form3Example2cd" 
        //                                          type="image"
        //                                          name="image"
        //                                          placeholder="image"
        //                                          value={image}
        //                                          onChange={e => setImage(e.target.value)} required/>
        //                                          <label className="form-label" htmlFor="form3Example2cd"><b>Image</b></label>
        //                                      </div>
        //                                  </div>
 
        //                                  {/* <div className="form-check d-flex justify-content-center mb-5">
        //                                      <input className="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
        //                                      <label className="form-check-label" htmlFor="form2Example3">
        //                                          I agree all statements in <a href="#!">Terms of service</a>
        //                                      </label>
        //                                  </div> */}
 
        //                                  <div className="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
        //                                  <button type="submit" className="btn btn-primary btn-lg">Register</button>
        //                                  </div>
 
        //                              </form>
                                         
        //                          </div>
        //                      </div>
        //                  </div>
        //              </div>  
        //       </div>      
        //   </div>
     )
 }

export default Register;