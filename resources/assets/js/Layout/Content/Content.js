import React, { Component } from "react";

class Content extends Component {
    render() {
        const n = 12;
        return (
            <div className="Placeholder">
                <h2>This is simply a placeholder...</h2>
                {[...Array(n)].map((e, i) => (
                    <div className="Placeholder_image" key={i}>
                        <img src="https://via.placeholder.com/250x250" />
                    </div>
                ))}
            </div>
        );
    }
}

export default Content;
