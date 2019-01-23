import React, { Component } from "react";
import { Slider, Rail, Handles, Tracks, Ticks } from "react-compound-slider";
import { nominalTypeHack } from "prop-types";

const sliderStyle = {
    // Give the slider some width
    position: "relative",
    width: "100%",
    height: 60
};

const railStyle = {
    position: "absolute",
    width: "100%",
    height: 8,
    marginTop: 20,
    borderRadius: 6,
    backgroundColor: "#8B9CB6"
};

class FifthComponent extends Component {
    constructor(props) {
        super(props);
        // this.changeHandler = this.changeHandler.bind(this);    

    
    }    
    render() {
        
        console.log("MinYear props: ", this.props.minYear);
        console.log("MaxYear props: ", this.props.maxYear);

        let minYear = this.props.minYear !== null && this.props.minYear !== "" ? this.props.minYear : 19;
        let maxYear = this.props.maxYear !== null && this.props.maxYear !== "" ? this.props.maxYear : 45;

        console.log("MinYear: ", minYear);
        console.log("MaxYear: ", maxYear);

        return (
            <React.Fragment>
                <h1>Years you prefer</h1>
            <Slider
                rootStyle={sliderStyle}
                domain={[18, 60]}
                step={1}
                mode={2}
                values={[minYear, maxYear]}
                //values={["19", "45"]}
                onChange={(values) => this.props.changeHandler(values)} // mora njegov values da mu prosledi
            >
                <Rail>
                    {(
                        { getRailProps } // adding the rail props sets up events on the rail
                    ) => <div style={railStyle} {...getRailProps()} />}
                </Rail>
                <Handles>
                    {({ handles, getHandleProps }) => (
                        <div className="slider-handles">
                            {handles.map(handle => (
                                <Handle
                                    key={handle.id}
                                
                                    handle={handle}
                                    getHandleProps={getHandleProps}
                                    
                                />
                            ))}
                        </div>
                    )}
                </Handles>
                <Tracks left={false} right={false}>
                    {({ tracks, getTrackProps }) => (
                        <div className="slider-tracks">
                            {tracks.map(({ id, source, target }) => (
                                <Track
                                    key={id}
                                    source={source}
                                    target={target}
                                    getTrackProps={getTrackProps}
                                />
                            ))}
                        </div>
                    )}
                </Tracks>
            </Slider>
            </React.Fragment>
        );
    }
}

function Handle({
    // your handle component
    handle: { id, value, percent },
    getHandleProps
}) {
    return (
        <div
            style={{
                left: `${percent}%`,
                position: "absolute",
                marginLeft: -5,
                marginTop: 15,
                zIndex: 2,
                width: 16,
                height: 16,
                border: 0,
                textAlign: "center",
                cursor: "pointer",
                borderRadius: "50%",
                backgroundColor: "#2C4870",
                color: "#000"
            }}
            {...getHandleProps(id)}
        >
            <div style={{ fontFamily: "Roboto", fontWeight: 800, color: "#1e678a", fontSize: 14, marginTop: -25 }}>
                {value}
            </div>
        </div>
    );
}

function Track({ source, target, getTrackProps }) {
    // your own track component
    return (
        <div
            style={{
                position: "absolute",
                height: 8,
                zIndex: 1,
                marginTop: 20,
                backgroundColor: "#1e678a",
                borderRadius: 6,
                cursor: "pointer",
                left: `${source.percent}%`,
                width: `${target.percent - source.percent}%`
            }}
            {...getTrackProps()}
        />
    );
}

export default FifthComponent;
