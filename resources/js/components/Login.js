import React, { useState } from 'react'
import axios from 'axios';
import { useNavigate } from 'react-router-dom';



 function Login  (props) {
    const navigate = useNavigate();
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('http://127.0.0.1:8000/api/login', {
            email: email,
            password: password
        }).then(response => {
            console.log(response)
            navigate("/listts");
        });
    }
    return (
        <div className="container h-100 "> 
                <p className="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                <form className="mx-1 mx-md-4" onSubmit={handleSubmit}>
                             <div className="card-body bg-primary d-flex flex-column align-items-center">
                            <input
                                type="email"
                                name="email"
                                placeholder="Email"
                                value={email}
                                onChange={e => setEmail(e.target.value)}
                                required
                            />
                            </div>
                            <div className="card-body bg-primary d-flex flex-column align-items-center " >
                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                value={password}
                                onChange={e => setPassword(e.target.value)}
                                required
                            />
                            </div>
                            <div className="card-body bg-primary d-flex flex-column align-items-center">
                            <button type="submit">Login</button>
                            </div>
                            
                </form>
        </div>
    );
}


export default Login;