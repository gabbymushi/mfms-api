import React, { Component } from 'react';

export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-8 col-md-offset-2">
                        <div className="panel panel-default">
                            <div className="panel-heading">Example Component</div>

                            <div className="panel-body">
                                <table className="table table-bordered">
                                    <thead>
                                    <th>Firt Name</th>
                                    <th>Surname</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Gabriel</td>
                                        <td>Patrick</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

