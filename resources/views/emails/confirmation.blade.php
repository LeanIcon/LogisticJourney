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
      background-color: #f5f5f5;
      padding: 20px;
      line-height: 1.6;
    }
    .email-container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      border: 1px solid #e0e0e0;
    }
    .header {
      background-color: #667eea;
      color: #ffffff;
      padding: 40px 30px;
      text-align: center;
    }
    .header h1 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .header p {
      font-size: 16px;
      opacity: 0.95;
    }
    .content {
      padding: 40px 30px;
      color: #333333;
    }
    .greeting {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 20px;
      color: #1a1a1a;
    }
    .message-text {
      font-size: 16px;
      line-height: 1.8;
      color: #4a4a4a;
      margin-bottom: 20px;
    }
    .highlight {
      color: #667eea;
      font-weight: 600;
    }
    .divider {
      height: 1px;
      background-color: #e0e0e0;
      margin: 30px 0;
    }
    .contact-box {
      background-color: #f9f9f9;
      border: 1px solid #e0e0e0;
      padding: 25px;
      margin: 30px 0;
    }
    .contact-title {
      font-size: 14px;
      font-weight: 700;
      color: #1a1a1a;
      margin-bottom: 12px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .contact-item {
      margin-bottom: 20px;
    }
    .contact-item:last-child {
      margin-bottom: 0;
    }
    .contact-label {
      font-size: 12px;
      font-weight: 600;
      color: #666666;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 6px;
    }
    .contact-link {
      display: inline-block;
      color: #667eea;
      text-decoration: none;
      font-size: 15px;
      font-weight: 500;
    }
    .contact-link:hover {
      text-decoration: underline;
    }
    .social-links {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }
    .social-link {
      display: inline-block;
      padding: 8px 16px;
      background-color: #667eea;
      color: #ffffff;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      border-radius: 4px;
    }
    .social-link:hover {
      background-color: #5568d3;
    }
    .cta-section {
      text-align: center;
      margin: 30px 0;
    }
    .cta-button {
      display: inline-block;
      background-color: #667eea;
      color: #ffffff;
      text-decoration: none;
      padding: 14px 40px;
      font-size: 15px;
      font-weight: 600;
      border-radius: 4px;
    }
    .cta-button:hover {
      background-color: #5568d3;
    }
    .footer {
      background-color: #2d3748;
      color: #cbd5e0;
      padding: 40px 30px;
      text-align: center;
      font-size: 14px;
    }
    .footer-company {
      margin-bottom: 20px;
    }
    .footer-company-name {
      font-size: 18px;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 4px;
    }
    .footer-tagline {
      font-size: 14px;
      color: #a0aec0;
    }
    .footer-address {
      background-color: rgba(102, 126, 234, 0.1);
      padding: 20px;
      margin: 20px 0;
      border-radius: 4px;
      line-height: 1.8;
    }
    .footer-address-title {
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #667eea;
      margin-bottom: 10px;
    }
    .footer-links {
      margin: 20px 0;
    }
    .footer-link {
      color: #a0aec0;
      text-decoration: none;
      margin: 0 12px;
      font-size: 13px;
    }
    .footer-link:hover {
      color: #667eea;
      text-decoration: underline;
    }
    .footer-copyright {
      font-size: 12px;
      color: #a0aec0;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid rgba(160, 174, 192, 0.2);
      line-height: 1.6;
    }
    @media (max-width: 600px) {
      body {
        padding: 0;
      }
      .email-container {
        border: none;
      }
      .header {
        padding: 30px 20px;
      }
      .header h1 {
        font-size: 28px;
      }
      .content {
        padding: 30px 20px;
      }
      .contact-box {
        padding: 20px;
      }
      .footer {
        padding: 30px 20px;
      }
      .footer-link {
        display: block;
        margin: 8px 0;
      }
    }
  </style>
</head>
<body>
  <div class="email-container">
    <!-- Header -->
    <div class="header">
      <h1>Thank You!</h1>
      <p>We've received your message and we're thrilled to connect</p>
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

      <!-- Contact Box -->
      <div class="contact-box">
        <div class="contact-title">Get In Touch</div>
        
        <div class="contact-item">
          <div class="contact-label">Email</div>
          <a href="mailto:sales@logisticjourney.com" class="contact-link">sales@logisticjourney.com</a>
        </div>

        <div class="contact-item gap-2">
          <div class="contact-label">Follow Us</div>
          <div class="social-links">
            <a href="https://www.linkedin.com/company/logisticjourney/" class="social-link">LinkedIn</a>
            <a href="https://www.instagram.com/logisticjourney/" class="social-link">Instagram</a>
            <a href="https://www.facebook.com/logisticjourney/" class="social-link">Facebook</a>
          </div>
        </div>
      </div>

      <div class="divider"></div>

      <!-- CTA -->
      <div class="cta-section">
        <a href="https://staging.logisticjourney.com" class="cta-button">Visit Our Website</a>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="footer-company">
        <div class="footer-company-name">Logistic Journey</div>
        <div class="footer-tagline">Logistics & Transportation Solutions</div>
      </div>

      <div class="footer-address">
        <div class="footer-address-title">Our Location</div>
        <div>
          The Workshop, Unit 7<br>
          70 Seventh Avenue<br>
          Parktown North, Johannesburg<br>
          Gauteng, South Africa
        </div>
      </div>

      <div class="footer-links">
        <a href="https://staging.logisticjourney.com/policy" class="footer-link">Privacy Policy</a>
        <span style="color: #4a5568;">•</span>
        <a href="https://staging.logisticjourney.com/terms" class="footer-link">Terms of Service</a>
      </div>

      <div class="footer-copyright">
        &copy; 2025 Logistic Journey. All rights reserved.<br>
        You're receiving this email because you contacted us through our website.
      </div>
    </div>
  </div>
</body>
</html>