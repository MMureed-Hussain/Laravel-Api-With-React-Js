import React from 'react'
import { Link } from 'react-router-dom'

export default function NavBar() {
  return (
    <>
        <nav className=" navbar navbar-expand-lg navbar-light bg-primary " >
            <Link className='navbar-brand text-light' to="/">Trello</Link>
            <Link className='navbar-brand text-light' to="/login">Login</Link>
            <Link className='navbar-brand text-light' to="/listts" >CreateList</Link>
            <Link className= 'navbar-brand text-light' to="/board" >Board</Link>
            <Link className='navbar-brand text-light' to="/register">Register</Link>
        </nav>
    </>
  )
}
