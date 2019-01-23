import React, { Component, PropTypes } from "react";
//import { hairs } from "../data.json";

class EightComponent extends Component {
    constructor(props) {
        super(props);
        this.hairChange = this.hairChange.bind(this);
        this.hairLists = [];
        // hairs.sort(function(a, b) {
        //     if (a < b) {
        //         return -1;
        //     }
        //     if (a > b) {
        //         return 1;
        //     }
        //     return 0;
        // });
        let hairs = this.props.allHairs;
        let clientHairs = this.props.clientHairs;

        hairs.map(hair => {
            let label_classes = "btn btn-primary";
            let checked = false;
            
            for(let i = 0; i < clientHairs.length; i++) {
                if (hair.name === clientHairs[i]) {
                    label_classes = "btn btn-primary active";
                    checked = true;
                    break;
                }
            }

            this.hairLists = [
                ...this.hairLists,
                <div
                    className="checkbox-div"
                    data-toggle="buttons"
                    key={hair.id}
                >
                    <label
                        className={label_classes}
                        value={hair.name}
                        onClick={this.hairChange}
                    >
                        {hair.name}
                    </label>
                    <input
                        type="checkbox"
                        ref={this.input}
                        value={hair.name}
                        defaultChecked={checked}
                    />
                    <span className="glyphicon glyphicon-ok" />
                </div>
            ]
        });

        this.state = {
            hairLists: ""
        };
    }
        hairChange(hair) {
            hair.preventDefault();
            this.props.changeHair(hair.target.getAttribute("value"));
        }
    
    
    
    
    render() { 
        return ( 
            <div>
                <h1>Hair you prefer</h1>
                <div className="interests-check">{this.hairLists}</div>
            </div>
         );
    }
}
 
export default EightComponent;