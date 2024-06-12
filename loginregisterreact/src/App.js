import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Layout from './pages/Layout';
import Home from './pages/Home';
import Contact from './pages/Contact';
import LoginReg from './pages/auth/LoginReg';
import ResetPassword from './pages/auth/ResetPassword';
import NewPassword from './pages/auth/NewPassword';
import Dashboard from './pages/Dashboard';

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
