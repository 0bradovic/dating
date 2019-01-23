import React, { Component, PropTypes } from "react";
//import { interests } from "../data.json";

class FourthComponent extends Component {
    constructor(props) {
        super(props);

        this.handleChange = this.handleChange.bind(this);
        // this.interestsUpdate= this.interestsUpdate.bind(this);
        this.input = React.createRef();

        this.interestsList = [];

        let interests = this.props.allInterests;
        let clientInterests = this.props.clientInterests;
        
        console.log("All inerests: ", interests);
        console.log("Client inerests: ", clientInterests);


        // interests.sort(function(a, b) {
        //     if (a < b) {
        //         return -1;
        //     }
        //     if (a > b) {
        //         return 1;
        //     }
        //     return 0;
        // });
        interests.map(interest => {
            let label_classes = "btn btn-primary";
            let checked = false;
            
            for(let i = 0; i < clientInterests.length; i++) {
                if (interest.id == clientInterests[i]) {
                    label_classes = "btn btn-primary active";
                    checked = true;
                    break;
                }
            }
                
            this.interestsList = [
                ...this.interestsList,
                <div
                    className="checkbox-div"
                    data-toggle="buttons"
                    key={interest.id}
                >
                    <label
                        className={label_classes}
                        value={interest.id}
                        onClick={this.handleChange}
                    >
                        {interest.name}
                    </label>
                    <input
                        type="checkbox"
                        ref={this.input}
                        value={interest.id}
                        defaultChecked={checked}
                    />
                    <span className="glyphicon glyphicon-ok" />
                </div>
            ]
        });

        this.state = {
            interestsList: ""
        };
    }

    handleChange(interest) {
        event.preventDefault();
        this.props.changeInterests(interest.target.getAttribute("value"));
        
    }

    render() {
        return (
            <div>
                <h1>Your Interest</h1>
                <div className="interests-check">{this.interestsList}</div>
            </div>
        );
    }
}

export default FourthComponent;
