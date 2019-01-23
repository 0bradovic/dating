import React, { Component } from "react";

import { Line } from "rc-progress";

class ProgressBar extends Component {
    constructor() {
        super();
        this.state = {
            percent: 0,
            color: "#3FC7FA"
        };
        this.changeState = this.changeState.bind(this);
    }

    changeState() {
        const colorMap = ["#3FC7FA", "#85D262", "#FE8C6A"];
        const value = parseInt(Math.random() * 100, 10);
        let switchComp = this.this.setState({
            percent: value,
            color: colorMap[parseInt(Math.random() * 3, 10)],
            
        });
        if(switchComp.percent.value <0){
            return value ==0;
        }
    }

    render() {
        const containerStyle = {
            width: "85%"
        };
        const circleContainerStyle = {
            width: "250px",
            height: "250px",
            display: "inline-block"
        };
        let percent = this.props.percent <= 100 ? this.props.percent : 100;
        return (
            <div className="progress-bar">
                <h3>Progress {percent}%</h3>
                <div style={containerStyle}>
                    <Line
                        percent={percent}
                        strokeWidth="4"
                        strokeColor={this.state.color}
                    />
                </div>

                <p>
                    {
                        this.props.currentStep < this.props.steps ?
                            <button onClick={this.props.changeState}>Next</button>
                        : ""
                    }
                    {
                        this.props.currentStep === this.props.steps ?
                            <button onClick={this.props.handlerSubmit}>Submit</button>
                        : ""
                    }
                    
                </p>
            </div>
        );
    }
}

export default ProgressBar;
