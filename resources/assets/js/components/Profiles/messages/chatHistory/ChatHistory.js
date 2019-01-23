import React, { Component } from "react";
import "./ChatHistory.scss";

class ChatHistory extends Component {
    constructor() {
        super();
        this.state = {};
    }
    render() {
        return (
            <React.Fragment>
                <div className="user_chat_text">
                    <div className="user_msg">
                        <div className="text_wrap">
                            <p>Hello</p>
                        </div>
                        <div className="text_wrap">
                            <p>Whats Up?!</p>
                        </div>

                        <div className="text_wrap">
                            <p>
                                You would change the prop in the parent
                                component, as that is what holds the value of
                                the prop itself. This would force a re-render of
                                any child components that use the specific prop
                                being changed. If you want to intercept the
                                props as they're sent, you can use the lifecycle
                                method componentWillReceiveProps.
                            </p>
                            <div className="msg_avatar">
                                <img src="" />
                            </div>
                        </div>
                    </div>

                    <div className="user_response">
                        <div className="text_wrap">
                            <p>Hello</p>
                        </div>
                        <div className="text_wrap">
                            <p>Whats Up?!</p>
                        </div>

                        <div className="text_wrap">
                            <p>
                                You would change the prop in the parent
                                component, as that is what holds the value of
                                the prop itself. This would force a re-render of
                                any child components that use the specific prop
                                being changed. If you want to intercept the
                                props as they're sent, you can use the lifecycle
                                method componentWillReceiveProps.
                            </p>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }
}

export default ChatHistory;
