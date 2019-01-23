import React, { Component } from "react";
import "./search.scss";
import {auth} from '../../helpers';
import { connect } from "react-redux";
import { setSearchEmployeesResult, setRedirect } from '../../Actions/Actions';
import { Redirect } from 'react-router-dom';


class SearchUser extends Component {
    constructor() {
        super();
        this.state={
            username:null,
            ageFrom:null,
            ageTo:null,
            online:null,
            availableVideoChat:null

        };
        this.yearArray=this.yearArray.bind(this);
        this.handleSubmit=this.handleSubmit.bind(this);
    }

    yearArray(){
        return _.range(18,99,1).map((el,index)=>{return (<option key={el} value={el}>{el}</option>)});
    }

    handleSubmit(e)
    {
        e.preventDefault();
        auth.post('client/search/employee',this.state)
            .then(res => {
                console.log(res.data);
                this.props.setSearchEmployeesResult(res.data); //from redux action
                this.props.setRedirect(true); //from redux action
                
            });
        console.log(this.state);
        document.getElementById('searchDropDownMenu').classList.remove("show");
        
    }
    render() {
        return (
            <React.Fragment>
                <form className="search_form"  onSubmit={this.handleSubmit}>
                    <h3>Search for your matches</h3>
                    <div className="search_username">
                        <input type="text" placeholder="Enter Nickname" onChange={(e)=>{this.setState({username:e.target.value})}}/>
                    </div>
                    <div className="row ages_holder">
                        <div className="col-2">
                            <p>Ages:</p>
                        </div>
                        <div className="col-5">
                            <div className="input-group">
                                <div className="input-group-prepend">
                                    <label
                                        className="input-group-text"
                                        htmlFor=""
                                    >
                                        from:
                                    </label>
                                </div>
                                <select className="custom-select" id="from" onChange={(e)=>{this.setState({ageFrom:e.target.value})}}>
                                  {
                                      this.yearArray()
                                  }
                                </select>
                            </div>
                        </div>
                        <div className="col-5">
                            <div className="input-group">
                                <div className="input-group-prepend">
                                    <label
                                        className="input-group-text"
                                        htmlFor=""
                                    >
                                        to:
                                    </label>
                                </div>
                                <select className="custom-select" id="to" onChange={(e)=>{this.setState({ageTo:e.target.value})}}>
                                   {
                                       this.yearArray()
                                   }
                                </select>
                            </div>
                        </div>
                    </div>
                    <div className="chat_available">
                        <label htmlFor="online">
                            <input type="checkbox" name="online" id="online"  onChange={(e)=>{this.setState({online:e.target.value})}}/>
                            <span>Online</span>
                        </label>

                        <label htmlFor="video-chat">
                            <input
                                type="checkbox"
                                name="video-chat"
                                id="video-chat"
                                onChange={(e)=>{this.setState({availableVideoChat:e.target.value})}}
                            />
                            <span>Available for Video Chat</span>
                        </label>
                    </div>

                    {/* <a href="" className="search_more">
                        Add More Search Filters
                    </a> */}

                    <div className="search_submit">
                        <button>Search</button>
                    </div>
                </form>
            </React.Fragment>
        );
    }
}

export default connect(null, { setSearchEmployeesResult, setRedirect })(SearchUser);
