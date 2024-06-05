import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Layout from './components/pages/Layout';
import Home from './components/pages/Home';
import Contact from './components/pages/Contact';

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<Layout/>}>
            <Route index element={<Home/>} />
            <Route path='contact' element={<Contact/>} />
          </Route>
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
