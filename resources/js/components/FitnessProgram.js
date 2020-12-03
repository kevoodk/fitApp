import React from 'react';
import ReactDom from 'react-dom';
import axios from 'axios';

function message() {
    return axios.get('http://localhost:8000/api/test')
      .then(response => {
        console.log(response.data)
    });
}

function FitnessProgram () {


    return (
            <h1>Hello Not user</h1>
            );
}

export default FitnessProgram;

if (document.getElementById("fitnessProgram")) {
    ReactDom.render(<FitnessProgram />, document.getElementById("fitnessProgram"));
}