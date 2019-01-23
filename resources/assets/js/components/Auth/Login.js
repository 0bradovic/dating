import React, { Component } from "react";
import {Button,Form,FormGroup,Label,FormControl,ControlLabel} from "react-bootstrap"
import {url} from "../../data/url";
import axios from "axios";


class Login extends Component{

    constructor(){
        super();
        this.state={
            email:'',
            password:'',
            authToken:'',
            user:{}
            
        }
        this.submit=this.submit.bind(this);
        // this.AuthToken=this.AuthToken.bind(this);
        

    }

    // AuthToken(authToken){
    //     this.props.callBackFromParentAuthToken(authToken);
    // }
 
    submit(e){
        e.preventDefault();
        const user=JSON.parse(JSON.stringify(this.state));
        
        axios.post(url+"/client/login",user).
        then(res=>{
            this.props.callBackFromParentAuthToken(res.data);
            console.log(res.data);
            console.log(res.status);
        });


    }
    render(){
        return(
            <div className="landing-page">
           
                <Form className="loggin" onSubmit={this.submit}>
                <FormGroup>
                    <ControlLabel>
                        Email
                    </ControlLabel>
                    {' '}
                    <FormControl
                    onChange={event=>{this.setState({email:event.target.value})}}
                    type="email"/>

                    
                </FormGroup>

                 <FormGroup>
                    <ControlLabel>
                        Password
                    </ControlLabel>
                    {' '}
                    <FormControl
                    onChange={event=>{this.setState({password:event.target.value})}}
                    type="password"/>

                    
                </FormGroup>
                {' '}
                <Button onMouseEnter={this.log}
                      
                         type='submit'>Log In</Button>
                </Form>
           
            
 
            </div>
        );
    }
}

export default Login;