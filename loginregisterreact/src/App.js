import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Layout from './components/pages/Layout';
import Home from './components/pages/Home';
import Contact from './components/pages/Contact';
import LoginReg from './components/pages/auth/LoginReg';
import ResetPassword from './components/pages/auth/ResetPassword';
import NewPassword from './components/pages/auth/NewPassword';
import Dashboard from './components/pages/Dashboard';

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<Layout/>}>
            <Route index element={<Home/>} />
            <Route path='contact' element={<Contact/>} />
            <Route path='login' element={<LoginReg/>} />
            <Route path='resetpassword' element={<ResetPassword/>} />
            <Route path='reset' element={<NewPassword/>} />
          </Route>
          <Route path='/dashboard' element={<Dashboard/>} />
          <Route path='*' element={<h1>Error 404 Page not Found !!</h1>} />
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
