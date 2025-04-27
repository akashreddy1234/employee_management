<!DOCTYPE html>
<html>
<head>
    <title>EPMS - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body style="margin: 0; font-family: 'Inter', sans-serif; background-color: #f4f4f4;">

<nav style="background-color: #1e3a8a; padding: 15px 30px; display: flex; align-items: center; justify-content: space-between;">
    <div style="color: white; font-weight: 600; font-size: 20px;">EPMS</div>
    <div style="display: flex; align-items: center; gap: 25px;">
        <a href="{{ url('/departments') }}" 
           style="color: white; text-decoration: none; font-weight: 500; 
                  padding: 8px 12px; border-radius: 4px;
                  transition: background-color 0.3s;"
           onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
           onmouseout="this.style.backgroundColor='transparent'">
            Departments
        </a>
        <a href="{{ url('/employees') }}" 
           style="color: white; text-decoration: none; font-weight: 500;
                  padding: 8px 12px; border-radius: 4px;
                  transition: background-color 0.3s;"
           onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
           onmouseout="this.style.backgroundColor='transparent'">
            Employees
        </a>
        <a href="{{ url('/salaries') }}" 
           style="color: white; text-decoration: none; font-weight: 500;
                  padding: 8px 12px; border-radius: 4px;
                  transition: background-color 0.3s;"
           onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
           onmouseout="this.style.backgroundColor='transparent'">
            Salaries
        </a>
        <a href="#about-us" 
           style="color: white; text-decoration: none; font-weight: 500;
                  padding: 8px 12px; border-radius: 4px;
                  transition: background-color 0.3s;"
           onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
           onmouseout="this.style.backgroundColor='transparent'">
            About Us
        </a>
        <a href="#contact-us" 
           style="color: white; text-decoration: none; font-weight: 500;
                  padding: 8px 12px; border-radius: 4px;
                  transition: background-color 0.3s;"
           onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'"
           onmouseout="this.style.backgroundColor='transparent'">
            Contact Us
        </a>

        @if(auth()->check())
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="background-color: #dc2626; color: white; border: none; padding: 8px 16px; border-radius: 5px; font-weight: 500; cursor: pointer;">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" style="background-color: #10b981; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none; font-weight: 500;">
                Login
            </a>
        @endif
    </div>
</nav>
    
    <section style="display: flex; height: 500px; background-color: #f4f4f4;">
        <div style="flex: 1; display: flex; flex-direction: column; justify-content: center; padding: 0 60px;">
            <h1 style="font-size: 2.5rem; color: #1e3a8a; margin-bottom: 1.5rem; font-weight: 700;">
                Employee Payment Management System
            </h1>
            <p style="font-size: 1.2rem; color: #4a5568; margin-bottom: 2rem; line-height: 1.6;">
                Streamline your payment process with our comprehensive solution for managing departments, employees, and salaries with complete transparency and efficiency.
            </p>
            <div>
                <a href="#departments" style="background-color: #1e3a8a; color: white; padding: 12px 30px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-block; margin-right: 15px;">
                    Explore Features
                </a>
                <a href="{{ route('login') }}" style="background-color: #ffffff; color: #1e3a8a; padding: 12px 30px; border-radius: 6px; text-decoration: none; font-weight: 500; display: inline-block; border: 2px solid #1e3a8a;">
                    Get Started
                </a>
            </div>
        </div>

        <div style="flex: 1; background-image: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1512&q=80'); background-size: cover; background-position: center;">
        </div>
    </section>

    <section id="departments" style="padding: 60px 40px; background-color: #e1f7d5; text-align: center;">
        <h2 style="font-size: 30px; font-weight: 600; color: #0b4b35;">Departments</h2>
        <p style="font-size: 16px; max-width: 700px; margin: 10px auto; color: #4a4a4a;">Manage all company departments in one place. Add, edit, or delete departments easily and keep everything organized.</p>
        
        <div style="margin-top: 20px; display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                🏢 Create & Track Departments
            </div>
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                🔁 Easily Edit Department Info
            </div>
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                📊 Department-wise Analytics
            </div>
        </div>

        <a href="{{ route('departments.index') }}" style="margin-top: 30px; display: inline-block; background-color: #2d6a4f; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 500;">Go to Departments</a>
    </section>

    <section id="employees" style="padding: 60px 40px; background-color: #f9d5e5; text-align: center; background-image: url('https://images.unsplash.com/photo-1521791136064-7986c2920216?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80'); background-size: cover; background-position: center; background-blend-mode: overlay;">
        <h2 style="font-size: 30px; font-weight: 600; color: #7f2d66;">Employees</h2>
        <p style="font-size: 16px; max-width: 700px; margin: 10px auto; color: #4a4a4a;">Easily manage employee records and gain insights into their performance and history.</p>

        <div style="margin-top: 20px; display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                🧑‍💼 Add & Edit Employee Records
            </div>
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                📊 Employee Performance Reports
            </div>
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                💼 Employee Contract Management
            </div>
        </div>

        <a href="{{ route('employees.index') }}" style="margin-top: 30px; display: inline-block; background-color: #a1336d; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 500;">Go to Employees</a>
    </section>

    <section id="salaries" style="padding: 60px 40px; background-color: rgba(255,236,179,0.8); text-align: center; background-image: url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'); background-size: cover; background-position: center; background-blend-mode: overlay;">
        <h2 style="font-size: 30px; font-weight: 600; color: #ff9800;">Salaries</h2>
        <p style="font-size: 16px; max-width: 700px; margin: 10px auto; color: #4a4a4a;">Track salary payments and gain transparency into payroll management with ease.</p>

        <div style="margin-top: 20px; display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                💰 Track Salary Payments
            </div>
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                📅 Generate Payslips & Reports
            </div>
            <div style="font-size: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); width: 220px;">
                🔄 Manage Deductions & Bonuses
            </div>
        </div>

        <a href="{{ route('salaries.index') }}" style="margin-top: 30px; display: inline-block; background-color: #fb8c00; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 500;">Go to Salaries</a>
    </section>

    <section id="why-choose-us" style="padding: 60px 40px; background-color: #f9fafb; text-align: center;">
        <h2 style="font-size: 32px; font-weight: 600; margin-bottom: 40px;">Why Choose Our System</h2>
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
            <div style="background-color: #e0f2fe; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 300px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.15)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 10px;">Simplified Payroll</h3>
                <p style="font-size: 15px; color: #555;">Easily manage salaries, deductions, and pay cycles with just a few clicks.</p>
            </div>

            <div style="background-color: #fef9c3; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 300px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.15)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 10px;">Real-Time Insights</h3>
                <p style="font-size: 15px; color: #555;">Get updated statistics on employees, salary disbursements, and department growth.</p>
            </div>

            <div style="background-color: #dcfce7; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 300px; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 6px 16px rgba(0,0,0,0.15)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 10px;">Secure & Reliable</h3>
                <p style="font-size: 15px; color: #555;">Built with modern security protocols to ensure all data remains confidential and protected.</p>
            </div>
        </div>
    </section>

    <section id="about-us" style="padding: 60px 40px; background-color: #f1f5f9; display: flex; justify-content: space-between; align-items: flex-start;">
        <div style="width: 48%; text-align: left;">
            <h2 style="font-size: 30px; font-weight: 600;">About Us</h2>
            <p style="font-size: 16px; max-width: 600px; margin: 10px 0;">We are a dedicated team committed to providing innovative solutions for managing employee payments efficiently, ensuring transparency and ease for both employees and employers.</p>
            <p style="font-size: 16px;">Our platform is designed with simplicity and efficiency in mind, offering a seamless experience for managing departments, employees, and salaries in one place.</p>
        </div>

        <div id="contact-us" style="width: 48%;">
            <h2 style="font-size: 24px; font-weight: 600; color: #2d3748; margin-bottom: 15px;">Get in Touch</h2>
            
            <div style="background: #f8fafc; border-radius: 8px; padding: 20px; border: 1px solid #e2e8f0;">
                <form action="{{ url('/contact-us') }}" method="POST">
                    @csrf
                    
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 13px; color: #4a5568; margin-bottom: 5px; font-weight: 500;">Name</label>
                        <input type="text" name="name" required 
                            style="width: 90%; padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e0;
                                    background: white; font-size: 14px;">
                    </div>
                    
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 13px; color: #4a5568; margin-bottom: 5px; font-weight: 500;">Email</label>
                        <input type="email" name="email" required 
                            style="width: 90%; padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e0;
                                    background: white; font-size: 14px;">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: #4a5568; margin-bottom: 5px; font-weight: 500;">Message</label>
                        <textarea name="message" rows="3" required 
                                style="width: 90%; padding: 8px 12px; border-radius: 6px; border: 1px solid #cbd5e0;
                                        background: white; font-size: 14px; resize: vertical;"></textarea>
                    </div>
                    
                    <button type="submit" 
                            style="background: #1e3a8a; color: white; 
                                padding: 10px 20px; border-radius: 6px; border: none; font-weight: 500; 
                                cursor: pointer; font-size: 14px; width: auto;">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer style="text-align: center; padding: 30px; background-color: #1e3a8a; color: white;">
        &copy; {{ date('Y') }} Employee Payment Management System. All rights reserved.
    </footer>

</body>
</html>