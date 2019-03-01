// app.js


require('./bootstrap');
import React from 'react';
import {render} from 'react-dom';
import {BrowserRouter} from 'react-router-dom';
import Master from './components/Master';

render(
    (<BrowserRouter>
        <Master/>
    </BrowserRouter>),
    document.getElementById('example'));