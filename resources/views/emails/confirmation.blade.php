<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notification Email</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      padding: 40px 20px;
      min-height: 100vh;
    }
    .email-container {
      max-width: 680px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
      padding: 60px 40px;
      text-align: center;
      color: white;
      position: relative;
      overflow: hidden;
    }
    .header::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.15) 1px, transparent 1px);
      background-size: 40px 40px;
      animation: drift 25s linear infinite;
    }
    @keyframes drift {
      0% { transform: translate(0, 0); }
      100% { transform: translate(40px, 40px); }
    }
    .header-content {
      position: relative;
      z-index: 1;
    }
    .header h1 {
      font-size: 44px;
      font-weight: 800;
      margin-bottom: 16px;
      letter-spacing: -1px;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .header p {
      font-size: 20px;
      opacity: 0.95;
      font-weight: 400;
      letter-spacing: 0.3px;
    }
    .content {
      padding: 56px 40px;
    }
    .greeting {
      font-size: 28px;
      color: #1a202c;
      font-weight: 700;
      margin-bottom: 28px;
      letter-spacing: -0.5px;
    }
    .message-text {
      font-size: 20px;
      line-height: 1.9;
      color: #4a5568;
      margin-bottom: 28px;
      font-weight: 400;
    }
    .highlight {
      color: #667eea;
      font-weight: 700;
      background: linear-gradient(135deg, #667eea, #764ba2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .divider {
      height: 2px;
      background: linear-gradient(to right, transparent, #e2e8f0, transparent);
      margin: 48px 0;
    }
    .contact-section {
      background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
      border-left: 5px solid #667eea;
      padding: 36px;
      border-radius: 12px;
      margin: 40px 0;
      box-shadow: 0 4px 12px rgba(102, 126, 234, 0.08);
    }
    .contact-title {
      font-size: 18px;
      color: #1a202c;
      font-weight: 700;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 1.2px;
    }
    .contact-link {
      display: flex;
      align-items: center;
      gap: 14px;
      text-decoration: none;
      font-size: 18px;
      color: #667eea;
      font-weight: 600;
      transition: all 0.3s ease;
      padding: 14px 18px;
      border-radius: 8px;
      margin-bottom: 12px;
      border: 2px solid transparent;
    }
    .contact-link:hover {
      background: white;
      color: #764ba2;
      border-color: #667eea;
      transform: translateX(4px);
    }
    .contact-icon {
      font-size: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: white;
      border-radius: 50%;
    }
    .social-section {
      margin-top: 32px;
      padding-top: 28px;
      border-top: 2px solid rgba(102, 126, 234, 0.2);
    }
    .social-title {
      font-size: 18px;
      color: #1a202c;
      font-weight: 700;
      margin-bottom: 20px;
      text-transform: uppercase;
      letter-spacing: 1.2px;
    }
    .social-links {
      display: flex;
      gap: 18px;
      justify-content: flex-start;
      flex-wrap: wrap;
    }
    .social-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 52px;
      height: 52px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 50%;
      text-decoration: none;
      color: white;
      font-size: 24px;
      transition: all 0.3s ease;
      box-shadow: 0 6px 16px rgba(102, 126, 234, 0.3);
    }
    .social-link:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 28px rgba(102, 126, 234, 0.4);
    }
    .cta-section {
      text-align: center;
      margin: 48px 0;
    }
    .cta-button {
      display: inline-block;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      text-decoration: none;
      padding: 20px 52px;
      border-radius: 50px;
      font-size: 18px;
      font-weight: 700;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 30px rgba(102, 126, 234, 0.35);
    }
    .cta-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 40px rgba(102, 126, 234, 0.45);
    }
    .footer {
      background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
      color: #cbd5e0;
      padding: 48px 40px;
      text-align: center;
      font-size: 16px;
      line-height: 1.8;
    }
    .footer-company {
      margin-bottom: 24px;
    }
    .footer-company-name {
      font-size: 18px;
      font-weight: 700;
      color: #f7fafc;
      margin-bottom: 8px;
    }
    .footer-address {
      background: rgba(102, 126, 234, 0.1);
      padding: 20px;
      border-radius: 8px;
      margin: 24px 0;
      font-size: 15px;
      line-height: 1.8;
      color: #cbd5e0;
    }
    .footer-address-title {
      font-size: 14px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #667eea;
      margin-bottom: 12px;
    }
    .footer-links {
      display: flex;
      gap: 24px;
      justify-content: center;
      flex-wrap: wrap;
      margin: 24px 0;
    }
    .footer-link {
      color: #a0aec0;
      text-decoration: none;
      font-size: 15px;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    .footer-link:hover {
      color: #667eea;
    }
    .footer-copyright {
      font-size: 14px;
      opacity: 0.8;
      margin-top: 24px;
      padding-top: 24px;
      border-top: 1px solid rgba(102, 126, 234, 0.2);
    }
    @media (max-width: 600px) {
      .email-container {
        margin: 0;
        border-radius: 0;
      }
      .header {
        padding: 40px 24px;
      }
      .header h1 {
        font-size: 36px;
      }
      .header p {
        font-size: 18px;
      }
      .content {
        padding: 40px 24px;
      }
      .greeting {
        font-size: 24px;
      }
      .message-text {
        font-size: 18px;
      }
      .contact-section {
        padding: 28px;
      }
      .contact-title {
        font-size: 16px;
      }
      .contact-link {
        font-size: 16px;
      }
      .social-link {
        width: 48px;
        height: 48px;
        font-size: 20px;
      }
      .cta-button {
        font-size: 16px;
        padding: 18px 40px;
      }
      .footer {
        padding: 40px 24px;
        font-size: 14px;
      }
      .footer-address {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="email-container">
    <!-- Header -->
    <div class="header">
      <div class="header-content">
        <h1>Thank You!</h1>
        <p>We've received your message and we're thrilled to connect</p>
      </div>
    </div>
    <!-- Main Content -->
    <div class="content">
      <p class="greeting">Hello!</p>
      <p class="message-text">
        Thank you so much for reaching out to <span class="highlight">Logistic Journey</span>. We truly appreciate your interest and the time you've taken to get in touch with us.
      </p>
      <p class="message-text">
        Your message has been received by our team, and we're reviewing it with great care. We'll be getting back to you shortly with a personalized response tailored to your specific needs and requirements.
      </p>
      <p class="message-text">
        If you need immediate assistance or have any urgent questions, please don't hesitate to reach out using the contact details below.
      </p>
      <!-- Contact Section -->
      <div class="contact-section">
        <div class="contact-title">Get In Touch</div>
        <a href="mailto:sales@logisticjourney.com" class="contact-link">
          <span class="contact-icon">✉️</span>
          <span>sales@logisticjourney.com</span>
        </a>
        <!-- Added social section with Instagram and Facebook -->
        <div class="social-section">
          <div class="social-title">Follow Us</div>
          <div class="social-links">
            <a href="https://www.linkedin.com/company/logisticjourney/" class="social-link" title="LinkedIn">in</a>
            <a href="https://www.instagram.com/logisticjourney/" class="social-link" title="Instagram">📷</a>
            <a href="https://www.facebook.com/logisticjourney/" class="social-link" title="Facebook">f</a>
          </div>
        </div>
      </div>
      <div class="divider"></div>
      <!-- CTA -->
      <div class="cta-section">
        <a href="https://new.logisticjourney.com" class="cta-button">Visit Our Website</a>
      </div>
    </div>
    <!-- Footer -->
    <div class="footer">
      <div class="footer-company">
        <div class="footer-company-name">Logistic Journey</div>
        <p style="font-size: 15px; color: #a0aec0;">Logistics & Transportation Solutions</p>
      </div>
      <!-- Added physical address section -->
      <div class="footer-address">
        <div class="footer-address-title">📍 Our Location</div>
        <div>
          The Workshop, Unit 7<br>
          70 Seventh Avenue<br>
          Parktown North, Johannesburg<br>
          Gauteng, South Africa
        </div>
      </div>
      <div class="footer-links">
        <a href="#" class="footer-link">Privacy Policy</a>
        <a href="#" class="footer-link">Terms of Service</a>
        <a href="#" class="footer-link">Unsubscribe</a>
      </div>
      <div class="footer-copyright">
        © 2025 Logistic Journey. All rights reserved.<br>
        You're receiving this email because you contacted us through our website.
      </div>
    </div>
  </div>
</body>
</html>
