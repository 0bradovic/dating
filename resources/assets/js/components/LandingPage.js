import React, { Component } from "react";
import {Button,Form,FormGroup,Label,FormControl,ControlLabel} from "react-bootstrap"

import Register from "./Auth/Register";
import Loggin from "./Auth/Loggin";


class LandingPage extends Component{
   constructor()
   {
       super();

       this.state={
        clicked:false,
       }
   }
    render(){
            
        
        return(

            <div>
                          
                
    

                {this.state.clicked ? (
                    <div>
                    <Loggin callBackFromParentAuthToken={this.props.callBackFromParent}/>
                    {' '}
                    <Button className="loggin-register" onClick={event=>this.setState({clicked:!this.state.clicked})}>Register</Button>
                    </div>
                ):
                (
                    <div>
                    <Register callBackFromParentAuthToken={this.props.callBackFromParent}/>
                    {' '}
                    <Button className="loggin-register" onClick={event=>this.setState({clicked:!this.state.clicked})}>Sign in</Button>
                    </div>
                )}
            </div>
        )
        
    }
}

export default LandingPage;