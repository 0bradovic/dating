import React, { Component } from "react";
import {Button,Form,FormGroup,FormControl,ControlLabel,Radio} from "react-bootstrap"
import {url} from "../../data/url";
import DatePicker from "react-datepicker";
import axios from "axios";
import 'react-datepicker/dist/react-datepicker.css';
import moment from 'moment';


class Register extends Component{
    constructor(){
        super();
        this.state={
            email:'',
            password:'',
            repeatPassword:'',
            username:'',
            gender:'',
            date_of_birth: moment()
        }
        this.onDateChange=this.onDateChange.bind(this);
        this.onSubmit=this.onSubmit.bind(this);
    }

    onSubmit(e){
        e.preventDefault();
        const user={
            email:this.state.email,
            password:this.state.password,
            username:this.state.username,
            gender:this.state.gender,
            date_of_birth:this.state.date.format("YYYY-MM-DD")

        }
        if(this.state.password===this.state.repeatPassword){
            console.log('user',user);
            axios.post(url+"/client/register",user).
            then(res=>{
                console.log(res.data);
                console.log(res.status);
            });
        }
         else alert("NOOB!");

    }

    onDateChange(e)
    {
        console.log(e.format("YYYY-MM-DD"));
        this.setState({date:e});
        console.log(this.state);
    }
    render(){
        return(
            <div className="landing-page">
           
                <Form className="register" onSubmit={this.onSubmit}>
                <FormGroup>
                    <ControlLabel>Username</ControlLabel>
                    {' '}
                    <FormControl
                    type="text"
                    onChange={event=>this.setState({username:event.target.value})}/>
                 </FormGroup>
                {' '}
                <FormGroup>
                    <ControlLabel>Email</ControlLabel>
                    {' '}
                    <FormControl
                    type="email"
                    onChange={event=>this.setState({email:event.target.value})}
                    />
                </FormGroup>
                {' '}
                 <FormGroup>
                    <ControlLabel>Password</ControlLabel>
                    {' '}
                    <FormControl
                    type="password"
                    onChange={event=>this.setState({password:event.target.value})}/>
                </FormGroup>
                {' '}

                <FormGroup>
                    <ControlLabel>Repeat password</ControlLabel>
                    {' '}
                    <FormControl
                    type="password"
                    onChange={event=>this.setState({repeatPassword:event.target.value})}/>
                </FormGroup>
                {' '}
                <FormGroup>
                    <Radio name="radioGroup" value="male" inline onChange={event=>this.setState({gender:event.target.value})}>
                        Male
                    </Radio>{' '}
                    <Radio name="radioGroup" value="female" inline onChange={event=>this.setState({gender:event.target.value})}>
                        Female
                    </Radio>{' '}
                 </FormGroup>
                 {' '}
               <DatePicker
                selected={this.state.date_of_birth} 
                onChange={this.onDateChange}
                dateFormat="LLL"
                 />
                
                <Button type='submit'>Sign Up</Button>
                </Form>
           
            
 
            </div>
        );
    }
}

export default Register;